import React from 'react';
import { Formik, Form, Field, ErrorMessage } from 'formik';
import { familySchema } from '../validationSchemas';

export default function Step2FamilyDetail({ initialValues, onNext, onBack }) {
  return (
    <Formik
      initialValues={{
        familyMembers: [{ name: '', age: '', relation: '', education: '', occupation: '', income: '' }],
        presentFamilyWellbeing: { food: '', housing: '', education: '', health: '', deeni: '' },
        presentHouseholdIncome: '',
        ...initialValues,
      }}
      validationSchema={familySchema}
      onSubmit={onNext}
    >
      {({ errors, touched, values }) => (
        <Form className="container mt-4">
          <div className="row">
            {values.familyMembers.map((_, idx) => (
              <div key={idx} className="col-md-6 mb-3">
                <h5>Family Member {idx + 1}</h5>
                {['name', 'age', 'relation', 'education', 'occupation', 'income'].map(field => (
                  <div key={field} className="mb-3">
                    <label htmlFor={`familyMembers[${idx}].${field}`} className="form-label">{field}</label>
                    <Field
                      name={`familyMembers[${idx}].${field}`}
                      className={`form-control ${errors.familyMembers && errors.familyMembers[idx] && errors.familyMembers[idx][field] ? 'is-invalid' : ''}`}
                    />
                    <ErrorMessage name={`familyMembers[${idx}].${field}`} component="div" className="text-danger" />
                  </div>
                ))}
              </div>
            ))}

            {/* Family Wellbeing */}
            {['food', 'housing', 'education', 'health', 'deeni'].map(field => (
              <div key={field} className="col-md-6 mb-3">
                <label htmlFor={`presentFamilyWellbeing.${field}`} className="form-label">{field}</label>
                <Field
                  name={`presentFamilyWellbeing.${field}`}
                  className={`form-control ${errors.presentFamilyWellbeing && errors.presentFamilyWellbeing[field] ? 'is-invalid' : ''}`}
                />
                <ErrorMessage name={`presentFamilyWellbeing.${field}`} component="div" className="text-danger" />
              </div>
            ))}
          </div>

          <div className="d-flex justify-content-between mt-4">
            <button type="button" onClick={onBack} className="btn btn-secondary">Previous</button>
            <button type="submit" className="btn btn-primary">Next Step</button>
          </div>
        </Form>
      )}
    </Formik>
  );
}
