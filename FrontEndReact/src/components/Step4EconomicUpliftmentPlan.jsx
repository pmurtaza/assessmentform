import React from 'react';
import { Formik, Form, Field, ErrorMessage } from 'formik';
import { upliftmentSchema } from '../validationSchemas';

export default function Step4EconomicUpliftmentPlan({ initialValues, onNext }) {
  return (
    <Formik
      initialValues={{
        actionPlan: '',
        assistanceNeeded: '',
        timeline: '',
        ...initialValues,
      }}
      validationSchema={upliftmentSchema}
      onSubmit={onNext}
    >
      {({ errors, touched }) => (
        <Form className="container mt-4">
          <div className="row">
            {/* Action Plan */}
            <div className="col-md-6 mb-3">
              <label htmlFor="actionPlan" className="form-label">Action Plan</label>
              <Field
                name="actionPlan"
                as="textarea"
                placeholder="Enter your action plan"
                className={`form-control ${errors.actionPlan && touched.actionPlan ? 'is-invalid' : ''}`}
                rows="3"
              />
              <ErrorMessage name="actionPlan" component="div" className="text-danger" />
            </div>

            {/* Assistance Needed */}
            <div className="col-md-6 mb-3">
              <label htmlFor="assistanceNeeded" className="form-label">Assistance Needed</label>
              <Field
                name="assistanceNeeded"
                as="textarea"
                placeholder="Enter assistance needed"
                className={`form-control ${errors.assistanceNeeded && touched.assistanceNeeded ? 'is-invalid' : ''}`}
                rows="3"
              />
              <ErrorMessage name="assistanceNeeded" component="div" className="text-danger" />
            </div>

            {/* Timeline */}
            <div className="col-md-6 mb-3">
              <label htmlFor="timeline" className="form-label">Timeline</label>
              <Field
                name="timeline"
                as="textarea"
                placeholder="Enter your timeline"
                className={`form-control ${errors.timeline && touched.timeline ? 'is-invalid' : ''}`}
                rows="3"
              />
              <ErrorMessage name="timeline" component="div" className="text-danger" />
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
