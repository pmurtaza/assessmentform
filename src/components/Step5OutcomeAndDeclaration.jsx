import React from 'react';
import { Formik, Form, Field, ErrorMessage } from 'formik';
import { declarationSchema } from '../validationSchemas';

export default function Step5OutcomeAndDeclaration({ initialValues, onNext }) {
  return (
    <Formik
      initialValues={{
        agreeToDeclaration: false,
        confirmation: '',
        ...initialValues,
      }}
      validationSchema={declarationSchema}
      onSubmit={onNext}
    >
      {({ errors, touched }) => (
        <Form className="container mt-4">
          <div className="row">
            {/* Agreement Checkbox */}
            <div className="col-md-12 mb-3 form-check">
              <Field
                type="checkbox"
                name="agreeToDeclaration"
                className="form-check-input"
              />
              <label className="form-check-label" htmlFor="agreeToDeclaration">
                I agree to the declaration and confirm the accuracy of the information provided
              </label>
              {errors.agreeToDeclaration && touched.agreeToDeclaration && (
                <div className="text-danger">{errors.agreeToDeclaration}</div>
              )}
            </div>

            {/* Confirmation */}
            <div className="col-md-12 mb-3">
              <label htmlFor="confirmation" className="form-label">Confirmation</label>
              <Field
                name="confirmation"
                as="textarea"
                placeholder="Enter your confirmation"
                className={`form-control ${errors.confirmation && touched.confirmation ? 'is-invalid' : ''}`}
                rows="3"
              />
              <ErrorMessage name="confirmation" component="div" className="text-danger" />
            </div>
          </div>

          <div className="d-flex justify-content-end mt-4">
            <button type="submit" className="btn btn-primary">Next Step</button>
          </div>
        </Form>
      )}
    </Formik>
  );
}
