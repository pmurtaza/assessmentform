import React from 'react';
import { Formik, Form, Field, ErrorMessage } from 'formik';
import { counsellorSchema } from '../validationSchemas';

export default function Step3CounsellorsAssessment({ initialValues, onNext, onBack }) {
  return (
    <Formik
      initialValues={{
        assessment: { strengths: '', weaknesses: '', opportunities: '' },
        recommendations: { businessOpportunities: '', competitiveness: '', customerAcquisition: '' },
        ...initialValues,
      }}
      validationSchema={counsellorSchema}
      onSubmit={onNext}
    >
      {({ errors, touched }) => (
        <Form className="container mt-4">
          <div className="row">
            {/* Assessment */}
            {['strengths', 'weaknesses', 'opportunities'].map(field => (
              <div key={field} className="col-md-6 mb-3">
                <label htmlFor={`assessment.${field}`} className="form-label">{field}</label>
                <Field
                  name={`assessment.${field}`}
                  className={`form-control ${errors.assessment && errors.assessment[field] ? 'is-invalid' : ''}`}
                  as="textarea"
                  rows="3"
                />
                <ErrorMessage name={`assessment.${field}`} component="div" className="text-danger" />
              </div>
            ))}
            
            {/* Recommendations */}
            {['businessOpportunities', 'competitiveness', 'customerAcquisition'].map(field => (
              <div key={field} className="col-md-6 mb-3">
                <label htmlFor={`recommendations.${field}`} className="form-label">{field}</label>
                <Field
                  name={`recommendations.${field}`}
                  className={`form-control ${errors.recommendations && errors.recommendations[field] ? 'is-invalid' : ''}`}
                  as="textarea"
                  rows="3"
                />
                <ErrorMessage name={`recommendations.${field}`} component="div" className="text-danger" />
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
